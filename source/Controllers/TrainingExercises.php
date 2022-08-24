<?php

namespace Source\Controllers;

use Dompdf\Dompdf;
use Source\Core\Connect;
use Source\Models\Auth;
use Source\Models\CompletedExercise;
use Source\Models\Exercise;
use Source\Models\Training;
use Source\Models\TrainingExercise;


class TrainingExercises extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function trainingExercises(?array $data): void
  {

    $user = Auth::user();
    $date = date("Y/m/d");

    $training_exercise = (new TrainingExercise())->find("training_id = :training_id AND position = :position", "training_id={$data["training_id"]}&position={$data["position"]} ")->fetch();

    $exercises = (new TrainingExercise())->find("training_id = :training_id", "training_id={$data["training_id"]}")->count();

    if (empty($training_exercise)) {
      $this->message->success("Treino finalizado com sucesso 😉👍")->flash();
      redirect("/trainings/{$data["training_sheet_id"]}");
    }

    $exercise = (new Exercise())->findById($training_exercise->exercise_id);

    $completedExercise = (new CompletedExercise())->find("training_exercises_id = :a AND training_id = :b AND training_sheet_id = :c AND user_id = :d AND date_of_the_conclusion = :e",
      "a={$training_exercise->id}&b={$data["training_id"]}&c={$data["training_sheet_id"]}&d={$user->id}&e={$date}")->fetch();

    if (!empty($completedExercise)) {
      $completedExerciseResult = 1;
    } else {
      $completedExerciseResult = 0;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/training_exercises", [
      "head" => $head,
      "training_exercise" => $training_exercise,
      "exercise" => $exercise,
      "training_id" => $data["training_id"],
      "training_sheet_id" => $data["training_sheet_id"],
      "countExercises" => $exercises,
      "completedExercise" => $completedExerciseResult
    ]);
  }

  public function completedExercise(?array $data): void
  {

    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    $user = Auth::user();

    $completeExerciseCreate = Connect::getInstance()->prepare(
      "INSERT INTO completed_exercises (training_exercises_id, training_id, training_sheet_id, user_id, date_of_the_conclusion)
      VALUES (:training_exercises_id, :training_id, :training_sheet_id, :user_id, :date_of_the_conclusion)"
    );

    $completeExerciseCreate->bindValue(":training_exercises_id", $data["training_exercise_id"], \PDO::PARAM_STR);
    $completeExerciseCreate->bindValue(":training_id", $data["training_id"], \PDO::PARAM_STR);
    $completeExerciseCreate->bindValue(":training_sheet_id", $data["training_sheet_id"], \PDO::PARAM_STR);
    $completeExerciseCreate->bindValue(":user_id", $user->id, \PDO::PARAM_STR);
    $completeExerciseCreate->bindValue(":date_of_the_conclusion", date("Y/m/d"), \PDO::PARAM_STR);

    // var_dump($data);
    // exit();

    $completeExerciseCreate->execute();

    // $completeExerciseCreate = new CompletedExercise();

    // $completeExerciseCreate->training_exercise_id = $data["training_exercise_id"];
    // $completeExerciseCreate->training_id = $data["training_id"];
    // $completeExerciseCreate->training_sheet_id = $data["training_sheet_id"];
    // $completeExerciseCreate->user_id = $user->id;
    // $completeExerciseCreate->date_of_the_conclusion = date('Y/m/d');

    // $completeExerciseCreate->save();

    $this->message->success("Exercício Finalizado 💪 🏋️")->flash();
    echo json_encode(["redirect" => url("/training-exercises/{$data["training_sheet_id"]}/{$data["training_id"]}/{$data["position"]}")]);
    return;
  }

  public function generatePDF(?array $data)
  {
    $exercises = (new TrainingExercise())->find("training_id = :a", "a={$data["training_id"]}")->order("position")->fetch(true);

    $name = (new Training())->findById($data["training_id"]);

    $table = '';

    foreach ($exercises as $item) {

      $method = (new \Source\Models\IntensificationMethod())->findById($item->intensification_method);
      $training = (new Exercise())->findById($item->exercise_id);


      $table .= '<tr>';
      $table .= '<td>' . $training->title . '</td>';
      $table .= '<td>' . $item->series . ' X</td>';
      $table .= '<td>' . $item->minimal_repetition . '</td>';
      $table .= '<td>' . $item->rest . 's</td>';
      $table .= '<td>' . $method->intensification_method . '</td>';
      $table .= '</tr>';

    }

    echo $table;

    $dompdf = new Dompdf();
    $dompdf->loadHtml('
    
  <style>
  table {
  border: 2px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 3px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
  border: 3px solid #ddd;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}

body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
</style>

<table>
  <caption>' . $name->name_training . '</caption>
  <thead>
    <tr>
      <th scope="col">Exercício</th>
      <th scope="col">Séries</th>
      <th scope="col">repetições</th>
      <th scope="col">Descanso</th>
      <th scope="col">Método de Intensificação</th>
    </tr>
  </thead>
  <tbody>
  ' . $table . '
  </tbody>
</table>
    ');

//    ob_start();
//    require __DIR__ . "/../../shared/views/trainingSheet.php";
//    $dompdf->loadHtml(ob_get_clean());


    $dompdf->setPaper("A4", "landscape");

    $dompdf->render();
    $dompdf->stream($name->name_training . ".pdf");
  }

  public function note(?array $data): void
  {
    $trainingExercise = (new TrainingExercise())->findById($data["id"]);

    $trainingExercise->notes = $data["content"];

    $trainingExercise->save();

    $this->message->success("Anotação salva com sucesso.")->flash();
    $json["reload"] = url("/app/categories}");
    echo json_encode($json);
  }
}
