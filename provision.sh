#!/bin/bash

# Set variables
RESOURCE_GROUP="AzureInlamning2"
LOCATION="northeurope"
VM_NAME="Inlamning2VM"

# Create resource group
az group create --name $RESOURCE_GROUP --location $LOCATION

# Create VM with Docker
az vm create \
    --resource-group $RESOURCE_GROUP \
    --location $LOCATION \
    --name $VM_NAME \
    --image Ubuntu2404 \
    --size Standard_B1s \
    --admin-username azureuser \
    --generate-ssh-keys \
    --custom-data @cloud-init_docker.sh

# Open required ports
az vm open-port --port 80 --resource-group $RESOURCE_GROUP --name $VM_NAME
az vm open-port --port 443 --resource-group $RESOURCE_GROUP --name $VM_NAMEi

# Get IP address
az vm show --resource-group $RESOURCE_GROUP --name $VM_NAME \
  --show-details --query [publicIps] --output tsv