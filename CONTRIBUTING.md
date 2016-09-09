# Contributing to the project
**Table of Contents**
- [General](#general)
- [Requirements](#requirements)
- [Windows developer issues](#windows-issues)
- [PHP Contributions](#php)
- [JavaScript Contributions](#javascript)
- [CSS Contributions](#css)
- [Icons](#icons)
- [Git Submodules used](#git-submodules)
- [NPM Modules / Dev dependencies](#dev-dependencies)

- - -

## General
Write access to the GitHub repository is restricted, so make a fork and clone that.
All work should be done on its own branch, named according to the issue number
(*e.g. `42` or `bug/23`*). When you are finished with your work, push your feature
branch to your fork, preserving branch name (*not to master*), and create a pull request.

**Always pull from `upstream master` prior to sending pull-requests.**

## Requirements
- [Apache](https://httpd.apache.org/)
- [PHP](https://secure.php.net/)
- [MySQL](https://dev.mysql.com/) or [MariaDB](https://mariadb.org/)
- [Node/NPM](https://nodejs.org/en/)
- [Git](https://www.git-scm.com/download/)

## Windows issues
> This project requires several command line tools which require installation and
some configuration on Windows. The following will need to be added to your `PATH`
in order to be functional. "Git Shell" & "Git Bash" that comes with GitHub Desktop
or Git GUI are fairly usable so long as you select "Use Windows' default console window"
during installation. See [Windows Environment Extension](https://technet.microsoft.com/en-us/library/cc770493.aspx)

- PHP
- Node
- Git
- MySQL
- GPG (GPG4Win)

## PHP
All pull requests **MUST** pass `php -l` linting, not raise any `E_STRICT` errors
when run.

## JavaScript
This project has the aim of making coding easier for developers while also
improving user experience. Load times and security are very important. Future development
will make use of Content-Security-Policy, creating a whitelist of scripts sources
which may be used. Any external scripts may eventually also make use of integrety
checks, which add a hash attribute to external scripts to ensure that the script
used is the same as what is expected. Use of `eval` is **strongly** discouraged
and may be restricted when CSP is implemented.

Additionally, JavaScript will ultimately be minified and transpiled from ES6 to ES5
using Babel and Webpack. This will be handled by NPM, possibly triggered by Git pull
through hooks.

Further, JavaScript will eventually be linted using ESLint, and must pass rules
defined in the ESLint config file in order to pass tests required to be merged
into the master branch.

Please make yourselves familiar with ECMAScript modules if you intend on working
with JavaScript in this project.

See sample ECMAScript 2016 code below for example.

![JavaScript sample](https://i.imgur.com/Ac0fKZu.png)

## CSS
Similar to the JavaScript guidelines, CSS in this project will be minified and
transpiled from CSS 3 or 4 down to CSS2 for compatiblity. Customization should
be done, as much as possible and appropriate, through use of CSS custom properties,
and local stylesheets combined together using `@import`. When Myth is run, it will
create an output stylesheet that is more compatible and minified. The original
stylesheet may be used while in development by most modern browsers.

![CSS sample](https://i.imgur.com/j4sC5qv.png)

## Icons
Wherever possible, all icons are to be created in SVG and minified. PNGs may
then be created in whatever size is appropriate. Also, all commonly used icons
are to be added to `images/icons.svg` so that they may be used using
`<symbol>` and `<use xlink:href/>`.

## NPM
Several useful modules are included for Node users, which is strongly recommended for all development aside from PHP. Simply run `npm install` after download to install all Node modules and Git submodules. There are also several NPM scripts configured, which may be run using `npm run $script`.
- `build:css` which transpiles and minifies CSS
- `build:js` which transpiles and minifies JavaScript
- `build:icons` which creates SVG sprites from `images/icons.json`
- `build:all` which runs all of the above
- `update` which updates Git submodules recursively, installing any new ones
- `test` which runs any configured tests
NPM also has a `postinstall` script which will automatically install and update

## Git submodules
- [shgysk8zer0/core_api](https://github.com/shgysk8zer0/core_api/)
- [shgysk8zer0/core](https://github.com/shgysk8zer0/core/)
- [shgysk8zer0/dom](https://github.com/shgysk8zer0/dom/)
- [shgysk8zer0/std-js](https://github.com/shgysk8zer0/std-js/)
- [shgysk8zer0/core-css](https://github.com/shgysk8zer0/core-css/)
- [shgysk8zer0/fonts](https://github.com/shgysk8zer0/fonts/)
- [shgysk8zer0/svg-icons](https://github.com/shgysk8zer0/svg-icons/)
- [shgysk8zer0/logos](https://github.com/shgysk8zer0/logos/)
- [github/octicons](https://github.com/github/octicons/)
- [necolas/normalize.css](https://github.com/necolas/normalize.css/)

## Dev dependencies
- [Myth](http://www.myth.io/)
- [Babel](https://babeljs.io/)
- [Webpack](https://webpack.github.io/)
- [ESLint](http://eslint.org/)
- [svgo](https://github.com/svg/svgo)
- [svg-sprite-generator](https://github.com/frexy/svg-sprite-generator)
