<?php

class Insert
{
    public $insertstatement;
    public $data;
    public $connection;
    public $report;


    function set_insertstatement($insertstatement)
    {
        $this->insertstatement = $insertstatement;
    }

    function set_data($data)
    {
        $this->data = $data;
    }

    function set_connection($connection)
    {
        $this->connection = $connection;
    }

    function insert_data()
    {
        if (empty($this->insertstatement) || empty($this->data)) {
            exit('SQL Statement or data not set');
        } else {
            $stmt = $this->connection->prepare($this->insertstatement);
            $stmt->bind_param(str_repeat("s", count($this->data)), ...$this->data);
            if (!$stmt->execute()) {
                $this->report = 'Insert Error';
            } else {
                $this->report = 'Inserted';
            }
        }
    }
}
