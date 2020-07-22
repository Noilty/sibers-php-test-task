<?php
/**
 * File with functions for working with template pages
 */

/**
 * Description
 *
 * @param $template
 * @param array $data
 * @param bool $withLayout
 * @param string $layout
 * @return false|string
 */
function view($template, $data = [], $withLayout = true, $layout = 'main')
{
    global $config;

    $templates = array(
        'layout' => "{$config['app']['templatesPath']}/" . DEFAULT_TEMPLATE . "/layouts/{$layout}.php",
        'page' => "{$config['app']['templatesPath']}/" . DEFAULT_TEMPLATE . "/{$template}.php"
    );

    $data['config'] = $config['app'];

    $pageView = getTemplateContent($templates['page'], $data);

    if ($withLayout) {
        $data['content'] = $pageView;

        return getTemplateContent($templates['layout'], $data);
    } else {
        return $pageView;
    }
}

/**
 * Description
 *
 * @param $filePath
 * @param array $data
 * @return false|string
 */
function getTemplateContent($filePath, $data)
{
    ob_start();

    extract($data);

    include $filePath;

    return ob_get_clean();
}