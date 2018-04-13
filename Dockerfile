FROM node:8-alpine
RUN apk add --no-cache git openssh
RUN ssh-keyscan -p 22 github.com >> ~/.ssh/known_hosts
ADD src /src
ADD ssh-key /root/id_rsa
RUN chmod 600 /root/id_rsa
RUN cd /src && npm install
RUN cd /src && npm run build