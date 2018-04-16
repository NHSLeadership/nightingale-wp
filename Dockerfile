FROM node:8-alpine as builder
RUN apk add --no-cache git openssh
ADD ssh-key /root/.ssh/id_rsa
RUN chmod 600 /root/.ssh/id_rsa
RUN ssh-keyscan -p 22 github.com >> ~/.ssh/known_hosts
ADD . /theme
RUN cd /theme && npm install
RUN cd /theme && npm run build
RUN printenv

RUN sed -i -e "s#Version: #Version: $BRANCH - $BUILD - #g" /theme/style.css

FROM alpine:latest
COPY --from=builder /theme /theme
RUN rm -f /theme/ssh-key