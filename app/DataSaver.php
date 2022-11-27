<?php

class DataSaver
{
    public $file;
    public $type;

    public function __destruct()
    {
        if ($this->type === "DEL")
            unlink($this->file);
    }

    public function loadStudents(): array
    {
        $jsonText = file_get_contents($this->file);

        if (!$jsonText) return [];

        $json = json_decode($jsonText, true);
        $students = [];
        foreach ($json as $key => $value) {
            ;
            $stud = new Student();
            foreach ($value as $k => $v) {
                $stud->{$k} = $v;
            }
            $students[$key] = $stud;
        }
        return $students;
    }

}