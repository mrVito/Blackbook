require 'yaml'

settings = YAML.load_file 'vagrant/vagrant.yml'

mysql = settings["mysql"]
sync = settings["sync"]

@sites = settings["sites"]
@db = settings["db"]

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/vivid64"

  config.vm.provision "shell" do |s|
  	s.path = "vagrant/scripts/bootstrap.sh"
  	s.args = [settings["host"], mysql["host"], mysql["user"], mysql["password"]]
  end

  @db.each do |item|
    config.vm.provision "shell" do |s|
      s.path = "vagrant/scripts/db.sh"
      s.args = [item, mysql["user"], mysql["password"]]
    end
  end

  @sites.each do |item|
    config.vm.provision "shell" do |s|
      s.path = "vagrant/scripts/sites.sh"
      s.args = [item["site"], item["in"]]
    end
  end

  config.vm.provision "shell", path: "vagrant/scripts/finish.sh"

  config.vm.network "private_network", ip: settings["ip"]
  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.synced_folder sync["from"], sync["to"]
  config.vm.synced_folder ".", "/vagrant", disabled: true
end