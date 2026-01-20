#!/bin/bash

# Script qui affiche ses paramètres par ordre alphabétique

if [ $# -eq 0 ]; then
    echo "Aucun paramètre fourni"
    exit 0
fi

# Affiche les paramètres triés par ordre alphabétique
printf '%s\n' "$@" | sort
