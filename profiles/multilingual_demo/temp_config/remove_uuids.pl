#!/usr/bin/perl

# Open the current directory.
my $directory = '.';
opendir (DIR, $directory) or die $!;
# Go through all files in the directory.
while (my $file = readdir(DIR)) {
  # Process yml files only.
  if ($file =~ /\.yml/) {
    $tmp_file = $file . '.nouuid';
    # Remove old temp file if it exists.
    unlink($tmp_file);
    open (MYFILE, $file);
    while (<MYFILE>) {
      # Print out the contents except for uuid lines.
      # Put in separate file for now.
      if (!($_ =~ /uuid/)) {
        open (MYFILE2, '>>' . $tmp_file); 
        print MYFILE2 $_;
        close (MYFILE2);
      }
    }
    close (MYFILE); 
    # Move original file out of the way.
    $orig_file = $file . '.orig';
    rename $file, $orig_file;
    # Move the new file to the old one.
    rename $tmp_file, $file;
  }
}
closedir(DIR);
exit 0;
