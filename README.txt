OHSU Neurology Concentration App
UPdated - 8/1/2014

All php and html pages are annotated within the files

Directories:

css
  Contains style sheets specific for quizy memory game
  Includes un-minified '_orig' file
  Includes img folder with basic pictures used in the concentration game UI

img
  Contains .png files with the images used in the icon card set
  Previous iterations included pictures used in other types of games e.g. color panels and flags
  Only icon images currently contained

lists
  Collection of php files listing which images are to be pulled from the img folder
  Currently only the icon lists are included, previous versions included other game types such as flags
  Numeric addendum based on grid size selected by the user, currently defaults to 4x6 although other sizes are retained

write
  Contains write.php which takes the results from the game and writes them to the SQL database
  Still kept in separate folder to maintain directory trees


js
  Folder containing all javascript jss files used in the concentration game
  Ajax library not listed here, called directly from google in template.php
  Includes jQuery versions 1.8 and 1.7.1
  Impromptu not used in current versions since user input is handled before the game is begun
    Retained just in case, includes both original and minified version
  Flip directly handles the flipping animation of the cards, is completely unmodified from original quizy version
  Quizy Memory Game is the principal javascript file
    Is largely unchanged from original version, revisions include adaptation of game board size and type
    Largest addition is Ajax call after game completion, location is marked in un-minified '_orig' file

