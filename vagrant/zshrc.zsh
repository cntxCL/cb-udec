#!/bin/zsh

# Carga los colores automaticamente
autoload -U colors compinit
colors
compinit

# Historial
export HISTSIZE=10000
export SAVEHIST=$HISTSIZE
export HISTFILE="$HOME/.zsh_history"

# Opciones
setopt BANG_HIST # Treat the '!' character specially during expansion.
setopt SHARE_HISTORY # Share history between all sessions.
setopt HIST_EXPIRE_DUPS_FIRST # Expire duplicate entries first when trimming history.
setopt HIST_IGNORE_DUPS # Don't record an entry that was just recorded again.
setopt HIST_IGNORE_ALL_DUPS # Delete old recorded entry if new entry is a duplicate.
setopt HIST_FIND_NO_DUPS # Do not display a line previously found.
setopt HIST_IGNORE_SPACE # Don't record an entry starting with a space.
setopt HIST_SAVE_NO_DUPS # Don't write duplicate entries in the history file.
setopt HIST_REDUCE_BLANKS # Remove superfluous blanks before recording entry.
setopt HIST_VERIFY # Don't execute immediately upon history expansion.
setopt HIST_BEEP # Beep when accessing nonexistent history.<Paste>
setopt AUTO_CD # Allow directory change without using cd command
setopt CORRECT # Corrects commmands misspellings
setopt COMPLETE_IN_WORD # Corrects commmands misspellings

# Cargar autocompletado
fpath=(/usr/local/share/zsh-completions $fpath)
zstyle ':completion:*' special-dirs true

# Editor por defecto nvim (o vim, o vi)
if hash nvim 2>/dev/null; then
	export VISUAL=nvim
	export EDITOR=nvim
elif hash vim 2>/dev/null; then
	export VISUAL=vim
	export EDITOR=vim
else
	export VISUAL=vi
	export EDITOR=vi
fi

# Promtp
setopt prompt_subst

local dot_start='━╾'
local dot_ts='╼┥'
local dot_end='┝╾'
local sep='╌'
local current='%F{cyan}%n%f at %F{magenta}%m%f in %F{blue}%0~%f on %F{white}VAGRANT%f'
local insert='%F{yellow}❯❯ %f'
local nl=$'\n'

function __prompt()
{
    local dynamic_dots
    local datetime

    datetime=" %D{%d-%m-%G} "
    let dots_count=${COLUMNS}-18 # dot_start(2) + dot_ts(2) + datetime(12) + dot_end(2)
    while [[ $dots_count -gt 0 ]]; do
        dynamic_dots="${dynamic_dots}$sep"
        let dots_count=${dots_count}-1
    done
    dynamic_dots="${dynamic_dots}"

    PROMPT="$dot_start$dynamic_dots$dot_ts$datetime$dot_end$nl$current$nl$insert"
}
PROMPT2="%F{yellow}◀ %f"
SPROMPT="%F{yellow}◀ %f Correct %F{red}%R%f to %F{green}%r%f [nyae]? "

precmd () { __prompt }

# Mover automáticamente a directorio '/vagrant' (si existe)
if [ -d "/vagrant" ]; then
    cd /vagrant
fi
