<?php

class Select
{
    public $selectstatement;
    public $data;
    public $connection;
    public $report;


    function set_selectstatement($selectstatement)
    {
        $this->selectstatement = $selectstatement;
    }

    function set_data($data)
    {
        $this->data = $data;
    }

    function set_connection($connection)
    {
        $this->connection = $connection;
    }

    function select_data()
    {
        if (empty($this->selectstatement) || empty($this->data)) {
            exit('SQL Statement or data not set');
        } else {
            if ($this->data == "false") {
                $stmt = $this->connection->prepare($this->selectstatement);
                if (!$stmt->execute()) {
                    $this->report = 'Select Error';
                } else {
                    $this->report = $stmt->get_result();
                }
            } else {
                $stmt = $this->connection->prepare($this->selectstatement);
                $stmt->bind_param(str_repeat("s", count($this->data)), ...$this->data);
                if (!$stmt->execute()) {
                    $this->report = 'Select Error';
                } else {
                    $this->report = $stmt->get_result();
                }
            }
        }
    }
}
