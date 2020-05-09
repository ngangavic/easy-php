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
            echo 'SQL Statement or data not set';
        } else {
            $stmt = $this->connection->prepare($this->insertstatement);
            $stmt->bind_param(str_repeat("s", count($this->data)), ...$this->data);
            if (!$stmt->execute()) {
                echo $this->report = 'Insert Error';
            } else {
                echo $this->report = 'Inserted';
            }
        }
    }
}
