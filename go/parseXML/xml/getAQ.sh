#!/bin/bash

DATE=`date +%Y-%m-%d_%H-%M-%S`
FILENAME=AQ_$DATE.xml
if wget http://www2.lulea.se/Luftdata/Luftkvalitet_LATEST.xml -O "/project/workspace/go/parseXML/xml/$FILENAME"; 
	then /project/workspace/go/parseXML/parseXML "/project/workspace/go/parseXML/xml/$FILENAME"
	else echo "couldnt download xml"
fi 
