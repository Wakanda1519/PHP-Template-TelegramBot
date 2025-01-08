<?php
namespace App\Models;

class CRUD
{
    public function Add($data, $file_path) {
        $all_data = $this->DecodeJson($file_path);
        $all_data[] = $data;
        $this->EncodeJson($all_data, $file_path);
    }

    public function SearchID($id, $file_path) {
        $all_data = $this->DecodeJson($file_path);
        foreach ($all_data as $item) {
            if (isset($item['id']) && $item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function SearchAll($file_path) {
        return $this->DecodeJson($file_path);
    }

    public function Update($id, $new_data, $file_path) {
        $all_data = $this->DecodeJson($file_path);
        foreach ($all_data as &$item) {
            if (isset($item['id']) && $item['id'] == $id) {
                $item = array_merge($item, $new_data);
                break;
            }
        }
        $this->EncodeJson($all_data, $file_path);
    }

    public function Delete($id, $file_path) {
        $all_data = $this->DecodeJson($file_path);
        $all_data = array_filter($all_data, function($item) use ($id) {
            return !(isset($item['id']) && $item['id'] == $id);
        });
        $this->EncodeJson(array_values($all_data), $file_path);
    }

    private function DecodeJson($file_path) {
        if (!file_exists($file_path)) {
            return [];
        }
        $jsonData = file_get_contents($file_path);
        return json_decode($jsonData, true) ?? [];
    }

    private function EncodeJson($data, $file_path) {
        file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
