module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      files: ['Gruntfile.js', 'js/**/*.js'],
      options: {
        globals: {
          jQuery: true
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'dist/output.min.js': ['js/**/*.js']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('compress', ['uglify']);
  grunt.registerTask('default', ['jshint']);

};