Notes:
- You will need at least 4GB of memory
- This has very much NOT been thoroughly tested

Instructions
- `curl -fsSL https://get.docker.com | sudo bash` (very naughty)
- Clone the lemmy and lemmy-ui forks recursively to a directory side-by-side
- Copy docker/.env.template to docker/.env and edit as necessary
- Copy docker/lemmy.hjson.template to docker/lemmy.hjson and edit as necessary
- For a public dev instance:
  - The external domain you chose will need to be publicly available at the box this runs on
  - Run `docker compose -f docker-compose.yml -f docker-compose.dev.yml -f docker-compose.traefik.yml up`
  - Site will be available at https://$LEMMY_UI_LEMMY_EXTERNAL_HOST/
- For a private instance:
  - Run `docker compose -f docker-compose.yml -f docker-compose.dev.yml up`
  - Site will be available at http://127.0.0.1:1236/
- For a "production" instance (using official images):
  - The external domain you chose will need to be publicly available at the box this runs on
  - Run `docker compose -f docker-compose.yml -f docker-compose.prod.yml -f docker-compose.traefik.yml up`
  - Site will be available at https://$LEMMY_UI_LEMMY_EXTERNAL_HOST/

Changes:
- Containers are for dev purposes
- Bind exposed ports to localhost only
- Create a .env.template and a lemmy.hjson template
- Switch to debian-based from alpine-based images (because musl)
- Add an unprivileged potsgres user
- Overhaul of the Nginx config
- Add a traefik config for easy TLS and some dev tooling
- A very blunt-force form of static-asset caching via nginx
- A static error page directing users to join-lemmy

Todo:
- Get rid of the compose scripts (in particular using sudo)
- Healthchecks for compose
- Can we offload pictrs?
- CI for compose
- Proper fingerprinting/cache busting
- Rootless images
