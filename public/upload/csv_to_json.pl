#!/usr/bin/perl
use strict;
use warnings;
use Text::CSV_XS;
use open ':std', ':encoding(UTF-8)';

my $csv = Text::CSV_XS->new({
  binary    => 1,
  auto_diag => 1,
  sep_char  => ','
});

my $file;
my $output;

if( defined $ARGV[0]){
  $file = $ARGV[0];
}else{
  print "Please provide input file name with extention\n";
  exit;
}
if( defined $ARGV[1]){
  $output = $ARGV[1];
}else{
  print "Please provide output file name with extention\n";
  exit;
}
open(my $data,'<', $file) or die "Can't open file";
open(FHR,'>>',$output) or die "Can't open file";
print FHR "[ ";

my $count = 1;
my @colum_name;

while (my $fie = $csv->getline($data)) {
  my @col_data = $fie;
  if( $count == 1){
    $colum_name[0] = $fie->[0];
    $colum_name[1]  = $fie->[1];
    $colum_name[2]  = $fie->[2];
    $colum_name[3]  = $fie->[3];
    $colum_name[4]  = $fie->[4];
    $colum_name[5]  = $fie->[5];
    $colum_name[6]  = $fie->[6];
    $colum_name[7]  = $fie->[7];
    $colum_name[8]  = $fie->[8];
  }
  if( $count > 2){
    print FHR "\,\n\n\n";
  }

  if( $count >= 2){
    print FHR qq({"$colum_name[0]" : "$fie->[0]",\n);
    print FHR qq("$colum_name[1]" : "$fie->[1]",\n);
    print FHR qq("$colum_name[2]" : "$fie->[2]",\n);
    print FHR qq("$colum_name[3]" : "$fie->[3]",\n);
    print FHR qq("$colum_name[4]" : "$fie->[4]",\n);
    print FHR qq("$colum_name[5]" : "$fie->[5]",\n);
    print FHR qq("$colum_name[6]" : "$fie->[6]",\n);
    print FHR qq("$colum_name[7]" : "$fie->[7]",\n);
    print FHR qq("$colum_name[8]" : "$fie->[8]"});
  }
   $count++;
}
print FHR " ]";

if (not $csv->eof) {
  $csv->error_diag();
}
close $data;
close FHR;
