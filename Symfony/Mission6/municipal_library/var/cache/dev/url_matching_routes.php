<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/default' => [[['_route' => 'app_default', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
        '/new' => [[['_route' => 'app_book_new', '_controller' => 'App\\Controller\\DefaultController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/([^/]++)(?'
                    .'|(*:214)'
                    .'|/(?'
                        .'|edit(*:230)'
                        .'|delete(*:244)'
                        .'|([^/]++)/loan(*:265)'
                    .')'
                .')'
                .'|/user(?'
                    .'|(*:283)'
                    .'|/([^/]++)(?'
                        .'|(*:303)'
                        .'|/edit(*:316)'
                        .'|(*:324)'
                    .')'
                .')'
                .'|/welcome(?'
                    .'|(*:345)'
                    .'|/([^/]++)(?'
                        .'|(?:/(h|f))?(*:376)'
                        .'|(*:384)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        214 => [[['_route' => 'app_book_show', '_controller' => 'App\\Controller\\DefaultController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        230 => [[['_route' => 'app_book_edit', '_controller' => 'App\\Controller\\DefaultController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        244 => [[['_route' => 'app_book_delete', '_controller' => 'App\\Controller\\DefaultController::delete'], ['id'], ['GET' => 0], null, false, false, null]],
        265 => [[['_route' => 'app_book_nloan', '_controller' => 'App\\Controller\\DefaultController::newLoan'], ['bookId', 'userId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        283 => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], [], ['GET' => 0], null, false, false, null]],
        303 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        316 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        324 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        345 => [[['_route' => 'app_welcome_index', '_controller' => 'App\\Controller\\WelcomeController::index'], [], ['GET' => 0], null, true, false, null]],
        376 => [[['_route' => 'app_welcome_index_gender', 'gender' => 'h', '_controller' => 'App\\Controller\\WelcomeController::indexCustom'], ['name', 'gender'], ['GET' => 0], null, false, true, null]],
        384 => [
            [['_route' => 'app_welcome_index_custom', '_controller' => 'App\\Controller\\WelcomeController::indexBasic'], ['name'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
