# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "boxcutter/debian8"
  config.vm.synced_folder ".", "/vagrant", group: "www-data", :mount_options => ["dmode=777", "fmode=777"]
  config.vm.provision :shell, path: "vagrant/provision.sh"
  config.vm.provider :vmware_fusion do |v, override|
    v.name = "cb-udec"
    override.vm.box = "bento/debian-8.7"
    override.vm.provision :shell, path: "vagrant/zsh-config.sh"
    override.vm.network "private_network", ip: "172.16.186.20"
  end
  config.vm.provider "parallels" do |v, override|
    override.vm.network "forwarded_port", host: 8000, guest: 80
  end
  config.vm.provider "virtualbox" do |v, override|
    override.vm.network "forwarded_port", host: 8000, guest: 80
  end
end
