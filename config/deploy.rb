# INITIAL CONFIGURATION
set :application, "raycoautomotriz.com"
set :export, :remote_cache
set :keep_releases, 5
set :cakephp_app_path, "app"
set :cakephp_core_path, "cake"
#default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "/home/bwc_prod/raycoautomotriz.com"

# USER & PASSWORD
set :user, 'bwc_prod'
set :password, 'Kwajalein43@2013'

# ROLES
role :app, "raycoautomotriz.com"
role :web, "raycoautomotriz.com"
role :db, "raycoautomotriz.com", :primary => true

# VERSION TRACKER INFORMATION
set :scm, :git
set :use_sudo, false
set :repository,  "git@github.com:bloomtec/rayco.git"
set :branch, "master"

# TASKS
namespace :deploy do
  
  task :start do ; end
  
  task :stop do ; end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "cp /home/bwc_prod/raycoautomotriz.com/current/. /home/bwc_prod/raycoautomotriz.com/ -R"
    run "chmod 777 /home/bwc_prod/raycoautomotriz.com/app/tmp/ -R"
  end
  
end