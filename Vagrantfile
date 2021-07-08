VAGRANTFILE_API_VERSION = "2"
 
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.provider "virtualbox" do |v|
    v.memory = 768
    v.name = "vibbra"
  end
  config.vm.synced_folder "../", "/var/www/"
  config.vm.box = "ubuntu/focal64"
  config.vm.network "forwarded_port", guest: 3306, host: 3306
  config.vm.network "forwarded_port", guest: 80, host: 80
  config.vm.provision :shell, path: "bootstrap.sh"
end
