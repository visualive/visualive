/**
 * VisuAlive the WordPress theme
 *
 * @package   VisuAlive.
 * @author    KUCKLU & VisuALive.
 * @copyright Copyright (c) KUCKLU and VisuAlive.
 * @link      https://www.visualive.jp/
 * @license   GNU General Public License version 3
 */
"use strict";

var conf = require("./gulp/config.js");
var requireDir = require("require-dir");
var tasks = requireDir(conf.tasks);
