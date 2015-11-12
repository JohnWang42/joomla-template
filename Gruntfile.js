/*
  Commands:
  default - refreshes non vendor files
  init - uploads everything including vendor files
  Refresh doesn't upload vendor JS and CSS files to save time, also skips images
*/
module.exports = function(grunt) {
  /*************************************************/
  //FTP SERVER AND LOCAL DIRECTORIES
  /*************************************************/
  var ftpServer = 'ftp.ord1-1.websitesettings.com';
  var ftpDir = 'SERVER_DIR';
  var localDir = 'LOCAL_DIR';
  /*************************************************/
  /*************************************************/
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    'prompt': {
      target: {
        options: {
          questions: [
            {
              config: 'dirPrompt',
              type: 'confirm',
              message: 'You are uploading to:\n' + ftpDir + '\nFROM\n' + localDir + '\nPlease confirm.',
              default: false,
              choices: ['yes', 'y', 'no', 'n'],
              then: function(results, done){
                return answ = results == 'yes' || results == 'y';
              }
            }
          ]
        }
      },
    },
    if: {
      default: {
        options: {
            test: function(){ return grunt.config('dirPrompt'); },
        },
        ifTrue: [ 'uglify', 'cssmin', 'ftp-deploy:refresh' ]
      },
      init: {
        options: {
            test: function(){ return grunt.config('dirPrompt'); },
        },
        ifTrue: [ 'uglify', 'cssmin', 'ftp-deploy:init' ]
      }
    },
    'uglify': {
      options: {
        sourceMap: true
      },
      my_target: {
        files: [{
          expand: true,
          cwd: 'js',
          src: ['*.js', '!*.min.js'],
          dest: 'js',
          ext: '.min.js'
        }]
      }
    },
    'cssmin': {
      target: {
        files: [{
          expand: true,
          cwd: 'css',
          src: ['*.css', '!*.min.css'],
          dest: 'css',
          ext: '.min.css'
        }]
      }
    },
    'ftp-deploy': {
      init: {
        auth: {
          host: ftpServer,
          port: 21,
          authKey: 'allebach'
        },
        src: localDir,
        dest: ftpDir,
        exclusions: [localDir + '/**/.DS_Store',
          localDir + '/**/Thumbs.db',
          localDir + '/node_modules',
          localDir + '/package.json',
          localDir + '/.ftppass',
          localDir + '/Gruntfile.js'
        ]
      },
      refresh: {
        auth: {
          host: ftpServer,
          port: 21,
          authKey: 'allebach'
        },
        src: localDir,
        dest: ftpDir,
        exclusions: [localDir + '/**/.DS_Store',
          localDir + '/**/Thumbs.db',
          localDir + '/node_modules',
          localDir + '/images',
          localDir + '/package.json',
          localDir + '/.ftppass',
          localDir + '/Gruntfile.js',
          localDir + '/css/vendor',
          localDir + '/js/vendor'
        ]
      }
    }
  });
  grunt.registerTask('default', ['prompt', 'if:default']);
  grunt.registerTask('init', ['prompt', 'if:init']);

  grunt.loadNpmTasks('grunt-prompt');
  grunt.loadNpmTasks('grunt-if');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-ftp-deploy');
};
