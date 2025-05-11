#!/bin/bash

# Cria um arquivo index.html
echo "<!DOCTYPE html>" > index.html
echo "<html lang=\"en\">" >> index.html
echo "<head><meta charset=\"UTF-8\"><title>Explorador de Arquivos</title></head>" >> index.html
echo "<body><h1>Arquivos</h1><ul>" >> index.html

# Lista arquivos e pastas
for item in *; do
  if [ -d "$item" ]; then
    echo "<li><a href=\"$item/\">$item/</a></li>" >> index.html
  else
    echo "<li><a href=\"$item\">$item</a></li>" >> index.html
  fi
done

echo "</ul></body></html>" >> index.html
