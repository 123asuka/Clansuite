/**
 * @file       /themes/core/javascript/codemirror_config.js
 * @desc       CodeMirror Configuration File for "Clansuite - just an eSports CMS"
 * @license    GNU/GPL v2 or (at your option) any later version, see "/doc/LICENSE".
 * @author     Jens-Andr� Koch <vain@clansuite.com>
 * @copyright  Copyleft: All rights reserved. Jens-Andr� Koch (2005 - onwards)
 * @link       http://www.clansuite.com
 * @version    SVN: $Id$
 */

$(document).ready(function() {

    /**
     * CodeMirror Manual
     *
     * @link http://marijn.haverbeke.nl/codemirror/manual.html
     */

    var editor = CodeMirror.fromTextArea("codecontent", {

      // The path parameter specifies the location where the script will find the parser and tokenizers files.
      path: "libraries/codemirror/js/",

      // The parserfile parameter specifies which parsers and tokenizer to load.
      // The following will enable a mixed-mode syntax highlighting by combining several parsers:
      // PHP+HTML+JavaScript+CSS.
      parserfile: ["parsexml.js",
                   "parsecss.js",
                   "tokenizejavascript.js", "parsejavascript.js",
                   "tokenizephp.js", "parsephp.js",
                   "parsephphtmlmixed.js"],

      // The stylesheet parameter defines the CSS to pull in for each corresponding parser.
      stylesheet: ["libraries/codemirror/css/xmlcolors.css",
                   "libraries/codemirror/css/jscolors.css",
                   "libraries/codemirror/css/csscolors.css"],

      autoMatchParens: true,
      width: '98%',
      height: 'dynamic',
      disableSpellcheck: true,
      textWrapping: true,
      lineNumbers: true,
      tabMode: 'spaces',
      iframeClass: 'ifc',
      indentUnit: 4,
      continuousScanning: 500

    });
});