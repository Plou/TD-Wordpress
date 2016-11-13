loadLocals = require('../../tools/loadLocals')
options = loadLocals('parameters')

if options.lint.lock
  tasks =
    sass : [
      'scsslint'
      'sass:dev'
      'postcss:dev'
      'clean:css'
    ]
    es2015: [
      'browserify:dev'
    ]
else
  tasks =
    sass : [
      'sass:dev'
      'postcss:dev'
      'clean:css'
    ]
    es2015: [
      'browserify:dev'
    ]


module.exports =

  sass:
    files:options.css.source+'**/*.scss'
    tasks: tasks.sass

  es2015:
    files: options.js.source+'**/*.js'
    tasks: tasks.es2015
