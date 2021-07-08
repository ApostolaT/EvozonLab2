DATE HELL
- You are required to write a function in PHP which receives 4 string arguments: startDateTime1, endDateTime1, startDateTime2 and endDateTime2. All strings are in the format 'dd-mmm-yyyy hh:mm:ss' and we assume the format was validated by an upper level. Your function must return a boolean value (true/false) which indicates whether the 2 timeframes overlap. You can use extra functions which do simpler things to organize your work.
- E.g.: ['10-05-2021 10:00:00', '13-05-2021  00:00:00'] and ['04-04-2021 21:30:15', '11-05-2021 04:30:00'] overlap (this is just one case of overlapping, you must think about all the others)
  When I get your solution, I'll try to break it so make sure your function is bulletproof!

BACK TO THE "ROOTS" OF NUMBERS
- You are given a text file called 'numbers.txt' which contains a series of digits (0-9), separated by a space character. The file may contain tons of numbers. Write a function that outputs, in ascending order, all the digits that are present in this file. Easy, right? Just one second, our client hates arrays AND stringand told the PHP guys to remove the array and string concepts from the language and you are forced to obey her wishes.
  First thought: Why would I ever want to work for such a client?
  Second thought: It's a challenge and I'm a programmer and I MUST love challenges. So let's do this!
- E.g. File contains 8 8 1 3 8 4 0 0 0 0 0 0 0 0 0 0 8
  Output: 0 1 3 4 8
