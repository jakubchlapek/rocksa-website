#!/bin/bash

rm -rf .ci/test-results && mkdir .ci/test-results
for file in $(find . -type f -path "*_output*" -name test_report.xml)
do
  echo -n "Processing $file file... "
  unique_name=$(echo ${file:2} | sed 's/\//_/g')
  mv $file .ci/test-results/$unique_name
  echo "[OK]"
done
