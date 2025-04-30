#!/bin/bash

source ./bashscripts/lib/custom.sh
# Validate input
if [ $# -ne 2 ]; then
    echo "Usage: $0 <path> <remote_repo>"
    exit 1
fi

# Input parameters
LOCAL_PATH="$1"
LOCAL_PATH_bak="$LOCAL_PATH"_bak
REMOTE_REPO="$2"
<<<<<<< HEAD
REMOTE_BRANCH=$(git symbolic-ref --short HEAD 2>/dev/null || echo "main")
=======
>>>>>>> d2064db (.)
TEMP_BRANCH=$(basename "$LOCAL_PATH")-temp

echo "  📁 Path: $LOCAL_PATH"
echo "  🌐 URL: $REMOTE_REPO"
<<<<<<< HEAD
echo "  🌐 Branch: $REMOTE_BRANCH"
echo "  🌐 Temporary branch: $TEMP_BRANCH"
=======
echo "  🌿 Branch: $BRANCH"
echo "  🌿 Temporary branch: $TEMP_BRANCH"
>>>>>>> d2064db (.)



if(! git ls-remote "$REMOTE_REPO" > /dev/null 2>&1)
then
    handle_error "Remote repository $REMOTE_REPO not found"
fi

# Sync subtree
push_subtree() {
    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    git add -A
    git commit -am "."
<<<<<<< HEAD
    git push -u origin "$REMOTE_BRANCH"


    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;


    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH")
    then
        log "❌ Failed to push subtree $LOCAL_PATH to $REMOTE_REPO"
        if(! git push  "$REMOTE_REPO" $(git subtree split --prefix="$LOCAL_PATH"):"$REMOTE_BRANCH")
        then
            log "❌ Failed split  to push subtree $LOCAL_PATH to $REMOTE_REPO"

            git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH"
            # Ora fai il merge del branch temporaneo con `git subtree merge`
            git subtree merge --prefix="$LOCAL_PATH" "$TEMP_BRANCH" || echo "❌ Failed to merge subtree"
            # Pulisci il branch temporaneo
            git branch -D "$TEMP_BRANCH" || echo "❌ Failed to delete temporary branch $TEMP_BRANCH"
    #        # First, split the subtree to a temporary branch
        #    git subtree split --prefix="$LOCAL_PATH" --rejoin -b "$TEMP_BRANCH"

    #        # Then force push that branch
        #    git push "$REMOTE_REPO" "$TEMP_BRANCH":"$REMOTE_BRANCH"

    #        # Optionally, clean up the temporary branch
    #        git branch -D "$TEMP_BRANCH"

    #        git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH"

            #mv "$LOCAL_PATH" "$LOCAL_PATH_bak" || die "Failed to rename $LOCAL_PATH to $LOCAL_PATH_bak"
            #git add .
            #git commit -am "Add $LOCAL_PATH_bak"
            #git subtree add --prefix="$LOCAL_PATH" "$REMOTE_REPO" "$REMOTE_BRANCH" --squash
             # Sincronizza i file dalla cartella di backup
            #rsync -avz "$LOCAL_PATH_bak/" "$LOCAL_PATH" || die "Failed to sync files"
            # Rimuovi la cartella di backup
            #rm -rf "$LOCAL_PATH_bak" || die "Failed to remove backup folder"
            # Commit delle modifiche
            #git add . || die "Failed to add changes after submodule sync"
            #git commit -am "Added submodule for $LOCAL_PATH" || die "Failed to commit submodule changes"
        fi
    fi


    git rebase --rebase-merges --strategy subtree "$REMOTE_BRANCH" --autosquash
    #git rebase --preserve-merges "$REMOTE_BRANCH"
=======
    git push -u origin "$BRANCH"

    find . -type f -name "*:Zone.Identifier" -exec rm -f {} \;

    #push_subtree_v1
    split_subtree
    
    git rebase --rebase-merges --strategy subtree "$BRANCH" --autosquash
    #git rebase --preserve-merges "$BRANCH"
}

push_subtree_v1() {
    if(! git subtree push -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"
    else
        log "❌ Fallimento push subtree $LOCAL_PATH verso $REMOTE_REPO"
    fi
}


split_subtree() {
    git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
    #--rejoin 
    if(git subtree split --prefix="$LOCAL_PATH" -b "$TEMP_BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH splitted"
    else 
        log "❌ Failed to split subtree"
    fi
    if(git push  "$REMOTE_REPO"  "$TEMP_BRANCH":"$BRANCH")
    then
        log "✅ Subtree $LOCAL_PATH pushed to $REMOTE_REPO"
    else
        log "❌ Failed to push subtree"
    fi
    git branch -D "$TEMP_BRANCH" || log "❌ Failed to delete temporary branch $TEMP_BRANCH"
    log "✅ Subtree $LOCAL_PATH splitted and pushed to $REMOTE_REPO"
>>>>>>> d2064db (.)
}

# Run sync
push_subtree

echo "👍 Subtree $LOCAL_PATH pushed successfully with $REMOTE_REPO"