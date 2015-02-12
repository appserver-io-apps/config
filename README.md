# config

[![Build Status](https://travis-ci.org/appserver-io-app/config.png)](https://travis-ci.org/appserver-io-app/config) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/appserver-io-app/config/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/appserver-io-app/config/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/appserver-io-app/config/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/appserver-io-app/config/?branch=master)

This webapp gives you the possibility to simply edit all appserver configuration files in your browser

## Installation

Goto your webapps folder and clone the webapp from githubby doing.

```bash
cd /opt/appserver/webapps
git clone https://github.com/appserver-io-apps/config
```

Now you have to build the javascript single page app which is build on angular.
> Make sure you have node, npm, grunt, compass etc. installed for building. if not check this out
[http://yeoman.io/codelab/setup.html](http://yeoman.io/codelab/setup.html).

```bash
bower install
npm install
grunt build
```

Now goto `http://127.0.0.1/config/dist`.
Here is your simple config editor.

## Todos

* Security checks.
* Authentication using digest auth for example.
* Exception handling in backend and frontend.
* Provide config file selector.
* Styling of the app should be in appserver ci

## Testing

Running `grunt test` will run the unit tests with karma.