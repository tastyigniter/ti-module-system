<?php
//
///**
// * Language helper functions
// * @package System
// */
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('addLanguageLine')) {
//    /**
//     * Add one or more lines to an existing language file.
//     *
//     * @param string $filename The name of the file to update.
//     *                           entries to update/add and the values to set them to.
//     * @param string $language The language of the file to update.
//     * @param array $new_values An array of key/value pairs containing the language
//     * @param string $domain The domain where the language is located.
//     *
//     * @return bool True on successful update, else false.
//     */
//    function addLanguageLine($filename, $language = 'english', $domain = 'main', $new_values = [])
//    {
//        $original_values = load_lang_file($filename, $language);
//
//        foreach ($new_values as $key => $val) {
//            $original_values[$key] = $val;
//        }
//
//        return save_lang_file($filename, $language, $domain, $original_values, FALSE, TRUE);
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('list_languages')) {
//    /**
//     * List existing languages in the system
//     * Lists the existing languages in the system by examining the core
//     * language folders in bonfire/application/language.
//     * @return array The names of the language directories.
//     */
//    function list_languages()
//    {
//        if (!function_exists('directory_map')) {
//            get_instance()->load->helper('directory');
//        }
//
//        return array_merge(
//            directory_map(APPPATH.ADMINDIR.'/language', 1, FALSE, 'index.html'),
//            directory_map(APPPATH.MAINDIR.'/language', 1, FALSE, 'index.html')
//        );
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('list_lang_files')) {
//    /**
//     * List all language files for the specified language
//     * Searches both the admin and main application/languages folder as well as all extension modules
//     * for folders matching the language name.
//     *
//     * @param string $language The language.
//     *
//     * @return array The filenames.
//     */
//    function list_lang_files($language = '')
//    {
//        if (empty($language)) {
//            return null;
//        }
//
//        // Base language files.
//        $langFiles = [];
//        $langFiles['main'] = find_lang_files(APPPATH.MAINDIR."/language/{$language}/");
//
//        // Build the 'custom' module lists.
//        $modules = ExtensionManager::instance()->listExtensions();
//        foreach ($modules as $module) {
//            $moduleLangs = ExtensionManager::instance()->files($module, 'language');
//
//            if (isset($moduleLangs[$module]['language'][$language])) {
//                $path = implode('/', [ExtensionManager::instance()->path($module, 'language'), $language]);
//                $files = find_lang_files($path.'/');
//
//                if (is_array($files)) {
//                    foreach ($files as $file) {
//                        $langFiles['module'][] = $module.'/'.$file;
//                    }
//                }
//            }
//        }
//
//        $langFiles['admin'] = find_lang_files(APPPATH.ADMINDIR."/language/{$language}/");
//
//        return $langFiles;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('find_lang_file')) {
//    /**
//     * Search entire system for a language file.
//     * Searches the admin, main, extensions and system folder for a language file and returns TRUE
//     * if found, FALSE if not found.
//     *
//     * @param string $langfile The language file to search.
//     * @param string $lang
//     *
//     * @return bool .
//     */
//    function find_lang_file($langfile = null, $lang = null)
//    {
//        if (empty($langfile)) {
//            return FALSE;
//        }
//
//        foreach ([APPPATH.APPDIR, BASEPATH, IGNITEPATH] as $domain) {
//            $path = rtrim($domain, "/")."/language/{$lang}/{$langfile}_lang.php";
//
//            if (is_file($path)) {
//                return TRUE;
//            }
//        }
//
//        $modules = ExtensionManager::instance()->listExtensions();
//        foreach ($modules as $module) {
//            list($path, $_langfile) = ExtensionManager::instance()->find($langfile.'_lang', $module, 'language/'.$lang.'/');
//            if ($path !== FALSE)
//                return TRUE;
//        }
//
//        return FALSE;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('find_lang_files')) {
//    /**
//     * Search a folder for language files.
//     * Searches an individual folder for any language files and returns an array
//     * appropriate for adding to the $langFiles array in the get_lang_files() function.
//     *
//     * @param string $path The folder to search.
//     *
//     * @return array Filenames.
//     */
//    function find_lang_files($path = null)
//    {
//        if (!is_dir($path)) {
//            return null;
//        }
//
//        $files = [];
//        foreach (glob($path.'*') as $filename) {
//            if (is_dir($filename)) {
//                $dir = basename($filename);
//                foreach (glob($filename.'/*_lang.php') as $fname)
//                    $files[] = $dir.'/'.rtrim(basename($fname), '.php');
//            }
//            else if (is_file($filename) AND strrpos($filename, '_lang.php') !== FALSE) {
//                $files[] = rtrim(basename($filename), '.php');
//            }
//        }
//
//        return $files;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('load_lang_file')) {
//    /**
//     * Load a single language file into an array.
//     *
//     * @param string $filename The name of the file to locate. The file will be
//     *                         found by looking in the admin, main and all modules languages folders.
//     * @param string $language The language to retrieve.
//     * @param string $domain The domain where the language is located.
//     *
//     * @return bool|null
//     */
//    function load_lang_file($filename = null, $language = 'english', $domain = 'main')
//    {
//        if (empty($filename)) {
//            return null;
//        }
//
//        if (file_exists(APPPATH."{$domain}/language/{$language}/{$filename}.php")) {
//            $path = APPPATH."{$domain}/language/{$language}/{$filename}.php";
//        }
//        else {
//            // Look in modules
//            $module = explode('/', $filename);
//            list($path, $_langfile) = ExtensionManager::instance()->find($filename, $module[0], 'language/'.$language.'/');
//            $path = $path.$_langfile.EXT;
//        }
//
//        // Load the actual array
//        if (is_file($path)) {
//            include($path);
//        }
//
//        if (!empty($lang) && is_array($lang)) {
//            return $lang;
//        }
//
//        return FALSE;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('clone_language')) {
//    /**
//     * Clone a single existing language.
//     *
//     * @param string $new_language The name for the newly cloned language.
//     * @param string $language The language to clone.
//     *
//     * @return bool
//     */
//    function clone_language($new_language = null, $language = 'english')
//    {
//        if (empty($new_language)) {
//            return FALSE;
//        }
//
//        // Clone the specified admin and main language files.
//        foreach ([MAINDIR, ADMINDIR] as $domain) {
//            copy_language_files(APPPATH."{$domain}/language/{$language}", APPPATH."{$domain}/language/{$new_language}");
//
//            // For backward-compatibility
//            if (is_file("{$domain}/language/{$new_language}/{$language}_lang.php")) {
//                rename("{$domain}/language/{$new_language}/{$language}_lang.php", "{$domain}/language/{$new_language}/default_lang.php");
//            }
//        }
//
//        // Clone then specified module language files.
//        $modules = ExtensionManager::instance()->listExtensions();
//        foreach ($modules as $module) {
//            $moduleLangs = ExtensionManager::instance()->files($module, 'language');
//
//            if (isset($moduleLangs[$module]['language'][$language])) {
//                $path = ExtensionManager::instance()->path($module, 'language');
//                copy_language_files("{$path}/{$language}", "{$path}/{$new_language}");
//            }
//        }
//
//        return TRUE;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('delete_language')) {
//    /**
//     * Delete existing language folder.
//     *
//     * @param string $language The language to delete.
//     *
//     * @return bool
//     */
//    function delete_language($language = null)
//    {
//        if (empty($language)) {
//            return FALSE;
//        }
//
//        if (!function_exists('delete_files')) {
//            get_instance()->load->helper('file');
//        }
//
//        // Delete the specified admin and main language folder.
//        foreach ([MAINDIR, ADMINDIR] as $domain) {
//            $path = APPPATH."{$domain}/language/{$language}";
//            if (is_dir($path)) {
//                delete_files($path, TRUE);
//                rmdir($path);
//            }
//        }
//
//        // Clone then specified module language files.
//        $modules = ExtensionManager::instance()->listExtensions();
//        foreach ($modules as $module) {
//            $moduleLangs = ExtensionManager::instance()->files($module, 'language');
//
//            if (isset($moduleLangs[$module]['language'][$language])) {
//                $path = ExtensionManager::instance()->path($module, 'language');
//                delete_files("{$path}/{$language}", TRUE);
//                rmdir("{$path}/{$language}");
//            }
//        }
//
//        return FALSE;
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('copy_language_files')) {
//    /**
//     * Copy all files in a single language folder
//     * Copy a single language directory recursively ( all file and directories
//     * inside it ). The language directory is found by looking in the admin, main and
//     * all modules languages folders.
//     *
//     * @param string $source_lang The language folder to copy.
//     * @param string $destination_lang The destination language folder.
//     *
//     * @return bool Returns false if $source_lang is not a directory
//     * or $destination_lang already exist.
//     */
//    function copy_language_files($source_lang, $destination_lang)
//    {
//        if (!function_exists('directory_map'))
//            get_instance()->load->helper('directory');
//
//        return copy_directory($source_lang, $destination_lang);
//    }
//}
//
//// ------------------------------------------------------------------------
//
//if (!function_exists('save_lang_file')) {
//    /**
//     * Save a language file.
//     *
//     * @param string $filename The name of the file to locate. The file will be
//     *                                  found by looking in the admin, main and all modules languages folders.
//     * @param string $language The language to retrieve.
//     * @param string $domain The domain where the language is located.
//     * @param array $new_values An array of the language lines to replace.
//     * @param boolean $return True to return the contents or false to write to
//     *                                  the file.
//     * @param boolean $allow_new_values If true, new values can be added to the file.
//     *
//     * @return bool|string False if there was a problem loading the file. Otherwise,
//     * returns true when $return is false or a string containing the file's contents
//     * when $return is true.
//     */
//    function save_lang_file($filename = null, $language = 'english', $domain = 'main', $new_values = [], $return = FALSE, $allow_new_values = FALSE)
//    {
//        if (empty($filename) OR !is_array($new_values)) {
//            return FALSE;
//        }
//
//        // Is it a admin, main or module domain lang file?
//        if (file_exists(APPPATH."{$domain}/language/{$language}/{$filename}")) {
//            $path = APPPATH."{$domain}/language/{$language}/{$filename}";
//        }
//        else {
//            // Look in modules
//            $module = str_replace('_lang.php', '', $filename);
//            $path = ExtensionManager::instance()->file_path($module, 'language', "{$language}/{$filename}");
//        }
//
//        // Load the file and loop through the lines
//        if (!is_file($path)) {
//            return FALSE;
//        }
//
//        $contents = file_get_contents($path);
//        $contents = trim($contents)."\n";
//
//        // Save the file.
//        foreach ($new_values as $name => $val) {
//            if ($val !== '') {
//                $val = '\''.addcslashes($val, '\'\\').'\'';
//            }
//
//            // Use strrpos() instead of strpos() so we don't lose data when
//            // people have put duplicate keys in the english files
//            $start = strrpos($contents, '$lang[\''.$name.'\']');
//            if ($start === FALSE) {
//                // Tried to add non-existent value?
//                if ($allow_new_values && $val !== '') {
//                    $contents .= "\n\$lang['{$name}'] = {$val};";
//                    continue;
//                }
//                else {
//                    return FALSE;
//                }
//            }
//            $end = strpos($contents, "\n", $start) + strlen("\n");
//
//            if ($val !== '') {
//                $replace = '$lang[\''.$name.'\'] = '.$val.";\n";
//            }
//            else {
//                $replace = '// '.substr($contents, $start, $end - $start);
//            }
//
//            $contents = substr($contents, 0, $start).$replace.substr($contents, $end);
//        }
//
//        // Is the produced code OK?
//        if (!is_null(eval(str_replace('<?php', '', $contents)))) {
//            return FALSE;
//        }
//
//        // Make sure the file still has the php opening header in it...
//        if (strpos($contents, '<?php') === FALSE) {
//            $contents = "<?php if ( ! defined('BASEPATH')) exit('No direct access allowed');\n\n{$contents}";
//        }
//
//        if ($return) {
//            return $contents;
//        }
//
//        // Write the changes out...
//        if (!function_exists('write_file')) {
//            get_instance()->load->helper('file');
//        }
//
//        if (write_file($path, $contents)) {
//            return TRUE;
//        }
//
//        return FALSE;
//    }
//}
