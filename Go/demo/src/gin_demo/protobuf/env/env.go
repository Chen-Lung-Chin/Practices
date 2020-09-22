package env

import (
	"encoding/base64"
	"flag"
	"fmt"
)

var (
	UseCipher   = flag.Bool("UseCipher", true, "Apply Encryption Ability")
	CipherID    = flag.Int("CipherID", 1000, "Cipher ID")
	CipherValue = flag.String("CipherValue", "kCBwZSXvpKC6iShm0BKBuw==", "Cipher Value")
	CipherKey   []byte
)

func init() {
	flag.Parse()

	var err error
	if CipherKey, err = base64.StdEncoding.DecodeString(*CipherValue); err != nil {
		panic(nil)
	} else {
		fmt.Printf("Value=%v, Key=%+v\n", *CipherValue, CipherKey)
	}

}
