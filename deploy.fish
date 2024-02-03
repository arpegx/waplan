#!/bin/fish

sail npm run build
npx tailwindcss -o ./public/assets/styles/build.css --minify
