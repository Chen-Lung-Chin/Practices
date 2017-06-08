#!/bin/sh
## Copyright 1998-2014 Epic Games, Inc. All Rights Reserved.
##
## Unreal Engine 4 AutomationTool setup script
##
## This script uses the .command extenion so that is clickable in
## in the OSX Finder.  All it does is call RunUAT.sh which does
## the real work.


CUR_FOLDER=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
$CUR_FOLDER/Packed/MacNoEditor/PrototypeProject.app/Contents/MacOS/PrototypeProject ResX=800 ResY=600 -NoVSync -FPS=20 ?DEBUG_UI1 ?Account=   9409AFD0CD4F1F991BE53FA80C64B088  ?Password=   9409AFD0CD4F1F991BE53FA80C64B088  AbsLog=$CUR_FOLDER/Log/ClientWithAccount.log 