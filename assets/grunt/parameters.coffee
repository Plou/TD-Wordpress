module.exports =
  sync:
    # Files which trigger a browser reload
    files: [
      '../css/*.css'
      '../js/*.js'
      '../img/**'
      '../../**.php'
      '../../**/*.php'
    ]
    # Start a basic file server
    server: false
    # Use an existing server (apache,node...)
    proxy: '127.0.0.1:8080' # 'domain.local'
    # Open browser on server start
    open: false

  # Errors while linting prevent compilation
  lint:
    lock: false

  autoprefixer:
    browsers: 'last 3 version'

  # Source files
  js:
    source: '../js/src/'
    dest: '../js/'
  css:
    source  : '../css/src/'
    dest : '../css/'
    style: 'compact'
    precision: 20
