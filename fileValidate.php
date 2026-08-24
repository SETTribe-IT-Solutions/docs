<?php
/**
 * File validation function
 *
 * @param string      $fileName
 * @param int         $fileSizeBytes
 * @param int|null    $maxSizeMB
 * @param string|null $extraExtensions   Add-on extensions (comma separated)
 * @param string|null $onlyExtensions    Override extensions (comma separated)
 *
 * @return bool
 */
function validateFile(
    $fileName,
    $fileSizeBytes,
    $maxSizeMB = null,
    $extraExtensions = null,
    $onlyExtensions = null
) {
    // Default extensions
    $defaultExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

    /**
     * EXTENSION LOGIC
     * - If extraExtensions is provided → default + extra
     * - If extraExtensions is blank AND onlyExtensions is provided → ONLY onlyExtensions
     * - Else → default only
     */
    if (!empty($extraExtensions)) {
        $allowedExtensions = array_merge(
            $defaultExtensions,
            array_map('strtolower', array_map('trim', explode(',', $extraExtensions)))
        );
    } elseif (!empty($onlyExtensions)) {
        $allowedExtensions = array_map(
            'strtolower',
            array_map('trim', explode(',', $onlyExtensions))
        );
    } else {
        $allowedExtensions = $defaultExtensions;
    }

    // Get file extension
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Extension validation
    if (!in_array($fileExtension, $allowedExtensions)) {
        return false;
    }

    // Size validation (only if provided)
    if (!empty($maxSizeMB)) {
        $maxSizeBytes = $maxSizeMB * 1024 * 1024;
        if ($fileSizeBytes > $maxSizeBytes) {
            return false;
        }
    }

    return true;
}

?>