FROM ruby:2.6.10-slim-bullseye
WORKDIR /app

RUN apt-get update
RUN apt-get install -y build-essential git

# throw errors if Gemfile has been modified since Gemfile.lock
RUN bundle config --global frozen 1

COPY .rvmrc Gemfile Gemfile.lock /app

RUN gem install bundler:2.1.2
RUN bundle install
