FROM ubuntu:20.04
LABEL dovecot doker image dockerfile customized by rich.com
RUN apt-get update &&\
  apt-get -y install \
  dovecot-core \
  dovecot-gssapi \
  dovecot-imapd \
  dovecot-lmtpd \
  dovecot-mysql \
  dovecot-pop3d \
  dovecot-imapd \
  dovecot-sieve \
  dovecot-solr \
  dovecot-submissiond 
COPY dovecot.conf /etc/dovecot/dovecot.conf
COPY 10-auth.conf /etc/dovecot/conf.d/
COPY auth-sql.conf.ext /etc/dovecot/conf.d/
COPY dovecot-sql.conf.ext /etc/dovecot/
COPY 10-mail.conf /etc/dovecot/conf.d/
COPY 10-master.conf /etc/dovecot/conf.d/
COPY 10-logging.conf /etc/dovecot/conf.d/
RUN groupadd -g 6000 vmail &&\
mkdir /home/vmail/ &&\
useradd -g vmail -u 6000 vmail -d /home/vmail -m &&\
chown -R vmail:dovecot /etc/dovecot &&\
chown -R vmail:vmail /home/vmail &&\
chmod -R o-rwx /etc/dovecot 
CMD ["/usr/sbin/dovecot", "-F"]