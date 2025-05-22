FROM ubuntu:20.04
RUN apt-get update && \
apt-get install -y \
postfix \
postfix-mysql \
rsyslog 
COPY master.cf /etc/postfix/master.cf
COPY main.cf /etc/postfix/main.cf
COPY database-domains.cf /etc/postfix/
COPY database-users.cf /etc/postfix/
COPY database-alias.cf /etc/postfix/
RUN chmod 640 /etc/postfix/database-domains.cf && \
chmod 640 /etc/postfix/database-users.cf && \
chmod 640 /etc/postfix/database-alias.cf && \
chown root:postfix /etc/postfix/database-domains.cf && \
chown root:postfix /etc/postfix/database-users.cf && \
chown root:postfix /etc/postfix/database-alias.cf
EXPOSE 25 587
CMD [ "postfix","start-fg" ]