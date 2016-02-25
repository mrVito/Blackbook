require 'yaml'

settings = YAML.load_file 'vagrant.yml'

db = settings["db"]
sync = settings["sync"]

Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/vivid64"

  config.vm.provision "shell" do |s|
  	s.path = "bootstrap.sh"
  	s.args = [settings["host"], db["host"], db["name"], db["user"], db["password"], settings["doc_root"]]
  end

  config.vm.network "private_network", ip: settings["ip"]
  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.synced_folder sync["from"], sync["to"]
  config.vm.synced_folder ".", "/vagrant", disabled: true
end