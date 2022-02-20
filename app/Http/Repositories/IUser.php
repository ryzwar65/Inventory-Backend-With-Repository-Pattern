<?php

namespace App\Http\Repositories;

interface IUser {
    public function getAll();
    public function getId($id);
    public function create($data);
    public function update($data,$id);
    public function delete($id);
}