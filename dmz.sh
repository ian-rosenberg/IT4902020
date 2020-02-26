#!/bin/bash
### end init firewall .. Start DMZ stuff ####
# forward traffic between DMZ and LAN
iptables -A FORWARD -i eth0 -o eth2 -m state --state NEW,ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -i eth2 -o eth0 -m state --state ESTABLISHED,RELATED -j ACCEPT

# forward traffic between DMZ and WAN servers SMTP, Mail etc
iptables -A FORWARD -i eth2 -o eth1 -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -i eth1 -o eth2 -m state --state NEW,ESTABLISHED,RELATED -j ACCEPT

# Route incoming SMTP (port 25 ) traffic to DMZ server 192.168.2.2
iptables -t nat -A PREROUTING -p tcp -i eth1 -d 202.54.1.1 --dport 25 -j DNAT --to-destination 192.168.2.2

# Route incoming HTTP (port 80 ) traffic to DMZ server load balancer IP 192.168.2.3
iptables -t nat -A PREROUTING -p tcp -i eth1 -d 202.54.1.1 --dport 80 -j DNAT --to-destination 192.168.2.3

# Route incoming HTTPS (port 443 ) traffic to DMZ server reverse load balancer IP 192.168.2.4
iptables -t nat -A PREROUTING -p tcp -i eth1 -d 202.54.1.1 --dport 443 -j DNAT --to-destination 192.168.2.4
### End DMZ .. Add other rules ###
