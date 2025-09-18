#!/bin/sh
<<<<<<< HEAD
<<<<<<< HEAD
if [ "$1" ]; then
     echo yes
else
    echo 'aggiungere il branch ./bashscripts/git_up_noai.sh  <branch>'
    exit 1
fi
me=$( readlink -f -- "$0";)
branch=$1
where=$(pwd)




git submodule update --progress --init --recursive --force --merge --rebase --remote
git submodule foreach "$me" "$branch"
find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
#delete old branches
#git push origin --delete cs0.2.03


git config core.fileMode false
git config advice.submoduleMergeConflict false
git config core.ignorecase false
git add --renormalize -A
#git add -A && aicommits  || echo '---------------------------empty'
git add -A && git commit -am "up"  || echo '---------------------------empty'
git push origin $branch -u --progress 'origin' || git push --set-upstream origin $branch
git rebase --continue || echo 'no rebasing'
echo "-------- END PUSH[$where ($branch)] ----------";
=======

# Controllo se è stato passato un argomento
=======
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
if [ "$1" ]; then
     echo yes
else
    echo 'aggiungere il branch ./bashscripts/git_up_noai.sh  <branch>'
    exit 1
fi
me=$( readlink -f -- "$0";)
branch=$1
where=$(pwd)




git submodule update --progress --init --recursive --force --merge --rebase --remote
git submodule foreach "$me" "$branch"
find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;
#delete old branches
#git push origin --delete cs0.2.03


git config core.fileMode false
git config advice.submoduleMergeConflict false
git config core.ignorecase false
git add --renormalize -A
#git add -A && aicommits  || echo '---------------------------empty'
git add -A && git commit -am "up"  || echo '---------------------------empty'
git push origin $branch -u --progress 'origin' || git push --set-upstream origin $branch
<<<<<<< HEAD

# Continuazione del rebase
echo "🔄 Rebase in corso..."
git rebase --continue || echo '🔔 Nessun rebase da continuare'

# Checkout e aggiornamento del branch
echo "🔀 Checkout del branch $branch..."
>>>>>>> d516087e (.)
=======
git rebase --continue || echo 'no rebasing'
echo "-------- END PUSH[$where ($branch)] ----------";
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
git checkout $branch --
git branch --set-upstream-to=origin/$branch $branch
git branch -u origin/$branch
git merge $branch
<<<<<<< HEAD
<<<<<<< HEAD
echo "-------- END BRANCH[$where ($branch)] ----------";
git submodule update --progress --init --recursive --force --merge --rebase --remote
git checkout $branch --
git pull origin $branch --autostash --recurse-submodules --allow-unrelated-histories --prune --progress -v --rebase
sed -i -e 's/\r$//' "$me"
echo "-------- END PULL[$where ($branch)] ----------";

=======

echo "-------- END PUSH[$where ($branch)] ----------"
echo "-------- END BRANCH[$where ($branch)] ----------"

# Ultima pull e aggiornamento
echo "🔄 Ultimo aggiornamento e pull dal repository remoto..."
=======
echo "-------- END BRANCH[$where ($branch)] ----------";
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
git submodule update --progress --init --recursive --force --merge --rebase --remote
git checkout $branch --
git pull origin $branch --autostash --recurse-submodules --allow-unrelated-histories --prune --progress -v --rebase
sed -i -e 's/\r$//' "$me"
echo "-------- END PULL[$where ($branch)] ----------";

<<<<<<< HEAD
echo "-------- END PULL[$where ($branch)] ----------"
>>>>>>> d516087e (.)
=======
>>>>>>> 8003fba6 (Squashed 'bashscripts/' changes from 79ba09c61..583e15e4a)
