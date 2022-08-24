<?php

namespace Source\Models;

use Source\Core\Model;

class Exercise extends Model
{
    public function __construct()
    {
        parent::__construct("exercises", ["id"], ["title", "description", "video_code"]);
    }

    public function save(): bool
    {
        /** User Update */
        if (!empty($this->id)) {
            $execiseId = $this->id;

            if ($this->find("title = :e AND id != :i", "e={$this->title}&i={$execiseId}", "id")->fetch()) {
                $this->message->warning("O treino informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$execiseId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {

            $execiseId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($execiseId))->data();
        return true;
    }
}
