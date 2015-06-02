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
    },

    rsync: {
        options: {
            args: ["--verbose"],
            exclude: [".git*","*.scss","node_modules"],
            recursive: true
        },
        dist: {
            options: {
                src: "./",
                dest: "../dist"
            }
        },
        stage: {
            options: {
                src: "../dist/",
                dest: "/var/www/site",
                host: "user@staging-host",
                delete: true // Careful this option could cause data loss, read the docs! 
            }
        },
        prod: {
            options: {
                src: "../dist/",
                dest: "/var/www/site",
                host: "user@live-host",
                delete: true // Careful this option could cause data loss, read the docs! 
            }
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
  grunt.loadNpmTasks("grunt-rsync");
  grunt.loadNpmTasks('grunt-global-config');

  grunt.registerTask('compress', ['uglify']);
  grunt.registerTask('default', ['jshint']);

};