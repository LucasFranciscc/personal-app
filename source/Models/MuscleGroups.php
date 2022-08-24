<?php

namespace Source\Models;

use Source\Core\Model;

class MuscleGroups extends Model
{
    public function __construct()
    {
        parent::__construct("muscle_groups", ["id"], ["muscle_group"]);
    }

    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Grupo muscular é obrigatória");
            return false;
        }

        /** Category Update */
        if (!empty($this->id)) {
            $muscleGroupId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$muscleGroupId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Category Create */
        if (empty($this->id)) {

            $muscleGroupId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($muscleGroupId))->data();
        return true;
    }
}