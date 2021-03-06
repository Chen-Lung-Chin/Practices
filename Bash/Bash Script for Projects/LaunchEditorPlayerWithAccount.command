#!/bin/sh
## Copyright 1998-2014 Epic Games, Inc. All Rights Reserved.
##
## Unreal Engine 4 AutomationTool setup script
##
## This script uses the .command extenion so that is clickable in
## in the OSX Finder.  All it does is call RunUAT.sh which does
## the real work.

CUR_FOLDER=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
PROJECT=PrototypeProject
UE4_SOURCE_FOLDER=/Users/$(whoami)/Documents/UnrealEngine-4.14
EDITOR=$UE4_SOURCE_FOLDER/Engine/Binaries/Mac/UE4Editor.app/Contents/MacOS/UE4Editor
##EDITOR=$UE4_SOURCE_FOLDER/Engine/Binaries/Mac/UE4Editor-Mac-Debug.app//Contents/MacOS/UE4Editor-Mac-Debug

## -log AbsLog=$CUR_FOLDER/Player1.log
$EDITOR $CUR_FOLDER/$PROJECT.uproject -game ResX=800 ResY=600 -FPS=30 ?DEBUG_UI1 ?Account=   CDD5968F014D78E7EB90AEA744E6A5A7  ?Password=   CDD5968F014D78E7EB90AEA744E6A5A7   $1 AbsLog=$CUR_FOLDER/Log/EditorPlayerWithAccount.log
