module.exports = function(grunt) {
  //minify all javascript and css files in their respective directories
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
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
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'css',
          src: ['*.css', '!*.min.css'],
          dest: 'css',
          ext: '.min.css'
        }]
      }
    }
  });
  grunt.registerTask('default', ['uglify', 'cssmin']);
  
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
};
