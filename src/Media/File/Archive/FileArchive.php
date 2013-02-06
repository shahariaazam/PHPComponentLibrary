<?php
/**
 * @Author  Shaharia Azam
 * @URL http://www.shahariaazam.com
 * This component will handle File Archive
 */

namespace Multimedia\File\Archive\FileArchive;

class FileArchive
{
    /**
     * @param array $SourceFiles
     * @param string $ZipDestination
     * @param bool $overwrite
     *
     * @return bool
     */
    function makeZip($SourceFiles = array(), $ZipDestination = '', $overwrite = false)
    {
        //Overwrite the existing ZIP if it's exist already
        if (file_exists($ZipDestination) && !$overwrite) {
            return false;
        }

        $valid_files = array();

        if (is_array($SourceFiles)) {
            foreach ($SourceFiles as $file) {
                //Whether the file is exists or not
                if (file_exists($file)) {
                    $valid_files[] = $file;
                }
            }
        }
        //Perform action on valid files
        if (count($valid_files)) {
            //create the archive
            $zip = new ZipArchive();
            if ($zip->open($ZipDestination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach ($valid_files as $file) {
                $zip->addFile($file, $file);
            }
            $zip->close();

            //double check that Zip created and exists at last
            return file_exists($ZipDestination);
        } else {
            return false;
        }
    }
}
