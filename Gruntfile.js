module.exports = function(grunt) {

  var conf = grunt.file.readJSON('conf.json');

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    compass: {
      dist: {
        options: {
          config: 'config.rb'
        }
      }
    },

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
    },
    watch: {
      scripts: {
        files: ['js/*.js'],
        tasks: ['jshint', 'uglify'],
        options: {
          spawn: false,
        },
      },
      styles: {
        files: ['styles/*.scss'],
        tasks: ['compass'],
        options: {
          spawn: false,
        },        
      }
    }
  });

  grunt.registerTask('deploy', 'Deploy site.', function() {
    grunt.log.writeln(conf.environments.production.address);
  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-global-config');

  grunt.registerTask('compress', ['uglify']);
  grunt.registerTask('default', ['jshint']);

};