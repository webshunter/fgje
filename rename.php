<?php
function listFilesInFolder($folderPath) {
    $fileList = [];

    // Cek apakah folder ada
    if (is_dir($folderPath)) {
        // Baca isi folder
        $files = scandir($folderPath);

        foreach ($files as $file) {
            // Skip folder "." dan ".."
            if ($file != "." && $file != "..") {
                $filePath = $folderPath . "/" . $file;

                if (is_dir($filePath)) {
                    // Jika ini adalah folder, panggil rekursif untuk folder tersebut
                    $fileList = array_merge($fileList, listFilesInFolder($filePath));
                } else {
                    // Jika ini adalah file, tambahkan pathnya ke dalam array
                    $fileList[] = $filePath;
                }
            }
        }
    } else {
        echo "Folder tidak ditemukan: $folderPath";
    }

    return $fileList;
}

function getFileList($folderPath) {
    return listFilesInFolder($folderPath);
}

$folderPath = "application/modules"; // Ganti dengan path folder Anda
$fileList = getFileList($folderPath);

$newList = [];

foreach($fileList as $jj){
    if (strpos($jj, "views") === false) {
        $newList[] = $jj;
    }
};

function renamefile($oldFilePath) {
    // Memeriksa apakah file lama ada
    if (file_exists($oldFilePath)) {
        $path_parts = pathinfo($oldFilePath); // Mendapatkan informasi path file
        $newFileName = ucfirst($path_parts['filename']); // Mengubah huruf pertama menjadi besar

        // Membuat path baru dengan nama file yang diubah
        $newFilePath = $path_parts['dirname'] . DIRECTORY_SEPARATOR . $newFileName . '.' . $path_parts['extension'];

        // Coba mengubah nama file
        if (rename($oldFilePath, $newFilePath)) {
            return "File berhasil diubah nama dari $oldFilePath menjadi $newFilePath.";
        } else {
            return "Gagal mengubah nama file.";
        }
    } else {
        return "File lama tidak ditemukan: $oldFilePath.";
    }
}

foreach($newList as $jk){
    renamefile($jk);
};